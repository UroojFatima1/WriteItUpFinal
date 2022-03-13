<?php
session_start();
include_once "../config.php";
if (isset($_POST['next'])) {
    $_SESSION["chapterNumber"] = $_SESSION["chapterNumber"] + 1;
    $title = $_SESSION['title'];
    $authorUsername = $_SESSION['authorUsername'];
    $currentChapter = $_SESSION['chapterNumber'];
    if ($currentChapter == $_SESSION["noOfChapters"] + 1) {
        echo "<script>
        alert('This was the last chapter');
        window.location.href='reader.php';</script>";
    }else {
        $sql = mysqli_query($conn, "SELECT * from story WHERE title='$title' AND authorUsername='$authorUsername' AND chapterNumber='$currentChapter'");
        if (mysqli_num_rows($sql) > 0) {
            $text = mysqli_fetch_assoc($sql);
            $_SESSION["text"] = $text["text"];
            echo "<script>window.location.href='writeup_story.php';</script>";
        }
    }
}
?>