<?php
// membuat file yang di crud.php dapat berfungsi disini
include 'crud.php';
//memeriksa apakah formulir sudah dikirim
if (isset($_POST['addTask'])) {
    //mengambil task baru dari form
    $task = $_POST['task'];

    createTask($task); //fungsi untuk menambahkan task baru
    header("Location: index.php"); //mengalihkan kembali ke halaman utama
    exit(); //menghentikan eksekusi lebih lanjut
}

//memeriksa apakah tag link selesai di klik
if (isset($_GET['complete'])) {
    //mengambil id tugas dari url
    $id = $_GET['complete'];

    //memanggil fungsi, menandai sudah selsai
    markTaskAsCompleted($id);
    header("Location: index.php"); //mengalihkan kembali ke halaman utama
    exit();
}

$tasks = gettasks(); //mengambil tugas dari dbase
?>

<!DOCTYPE html>
<html>
<head>
    <title>To-Do List</title>
</head>
<body>
    <h1>To-Do List </h1>
<!-- Menambahkan form untuk melakukan input todos -->
<!-- method post, karena kita ingin mengirimkan data -->
<!-- action, menunjukkan url data form dikirim -->
    <form method="post" action="index.php">
        <input type="text" name="task" placeholder="Enter a new task">
        <button type="submit" name="addTask">Add Task</button>
    </form>
    <h2>Tasks</h2>
    <ul>
        <?php if (isset($tasks) && !empty($tasks)): ?>
            <?php foreach ($tasks as $task): ?>
                <li>
                    <?php echo $task['task']; ?>
                    <?php if (!$task['completed']): ?>
                        <a href="index.php?complete=<?php echo $task['id']; ?>">Complete</a>
                    <?php else: ?>
                        (Completed)
                    <?php endif;?>
                </li>
            <?php endforeach;?>
        <?php else: ?>
            <li>No tasks yet.</li>
        <?php endif;?>
    </ul>
</body>
</html>
