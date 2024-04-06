<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam</title>
</head>
<body>
    <h1>Exam</h1>
    
    <form action="submit_exam.php" method="POST">
        <div>
            <p>Question 1: What is the capital of France?</p>
            <input type="radio" id="a" name="q1" value="a">
            <label for="a">a. Paris</label><br>
            <input type="radio" id="b" name="q1" value="b">
            <label for="b">b. London</label><br>
            <input type="radio" id="c" name="q1" value="c">
            <label for="c">c. Berlin</label><br>
            <input type="radio" id="d" name="q1" value="d">
            <label for="d">d. Rome</label><br>
        </div>
        
        <!-- Add more questions here -->
        
        <button type="submit">Submit Exam</button>
    </form>
</body>
</html>
