<?php
$file = "data.txt";

if (!file_exists($file)) {
    die("Không tìm thấy file $file");
}

$lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$questions = [];
$current = [];

foreach ($lines as $line) {
    $line = trim($line);
    if ($line == "") continue;
    // Nếu dòng bắt đầu bằng "A.", "B.", "C.", "D."
    if (preg_match("/^[A-D]\./", $line)) {
        $current['options'][] = substr($line, 2); // bỏ ký tự "A." / "B."...
    }
    // Nếu dòng bắt đầu bằng "ANSWER:"
    else if (stripos($line, "ANSWER:") === 0) {
        $current['correct'] = trim(substr($line, 7)); // lấy đáp án
        $questions[] = $current; // lưu câu hỏi hoàn chỉnh
        $current = [];
    } 
    // Ngược lại là câu hỏi
    else {
        $current['question'] = $line;
        $current['options'] = [];
    }
}
$total = count($questions);
$score = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $score = 0;
    foreach ($questions as $index => $q) {
        $userAnswer = $_POST['q'.$index] ?? [];
        if (!is_array($userAnswer)) $userAnswer = [$userAnswer];

        // chuẩn hóa đáp án đúng
        $correct = is_array($q['correct']) ? $q['correct'] : [$q['correct']];

        // so sánh (bỏ qua thứ tự)
        sort($userAnswer);
        sort($correct);
        if ($userAnswer === $correct) $score++;
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Bài thi trắc nghiệm - 4+ đáp án</title>
</head>
<body>

<h2>Danh sách câu hỏi trắc nghiệm (đọc từ file)</h2>

<form method="post">
<?php
$stt = 1;
foreach ($questions as $index => $q):
    $multiple = is_array($q['correct']); // nhiều đáp án?
?>
    <p><b>Câu <?= $stt++ ?>:</b> <?= $q['question'] ?></p>

    <?php foreach ($q['options'] as $i => $opt):
        $letter = chr(65 + $i); // A, B, C ...
    ?>
        <label>
            <input type="<?= $multiple ? 'checkbox' : 'radio' ?>"
                    name="q<?= $index ?><?= $multiple ? '[]' : '' ?>"
                    value="<?= $letter ?>">
            <?= $letter ?>. <?= $opt ?>
        </label><br>
    <?php endforeach; ?>
    <br>
<?php endforeach; ?>

<input type="submit" value="Nộp bài">
<?php if ($score !== null): ?>
    <h3>Bạn đã trả lời đúng <?= $score ?> / <?= $total ?> câu.</h3>
<?php endif; ?>
</form>
</body>
</html>

