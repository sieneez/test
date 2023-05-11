<?php
error_reporting(0);
if (isset($_POST['submit'])) {

  function get_data()
  {
    $subtasks = array();
    for ($i = 1; $i < 10; $i++) {
      $subt = 'subtitle_' . $i;
      $hours = 'hours_' . $i;
      if ($_POST[$subt]) {
        $subtasks[] = array(
          'subtitle' => $_POST[$subt],
          'hours' => $_POST[$hours]
        );
      }
    }

    $datae = array();
    $datae[] = array(
      'title' => $_POST['title'],
      'subtasks' => $subtasks,
    );
    return json_encode($datae, JSON_UNESCAPED_UNICODE);
  }

  $name = "data";
  $file_name = $name . '.json';

  if (file_put_contents(
    "$file_name",
    get_data()
  ));
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css" />
  <title>Оценка проекта по задачам и сохранение в файл</title>
</head>

<body>
  <div class="wrapper">
    <div class="task_block">
      <form method="POST">
        <div class="task_title">Название задачи</div>
        <input type="text" placeholder="Название задачи" name="title" class="input" />
        <div class="task_title">Список подзадач</div>
        <div class="subtasks_block" id="subtasks">
          <!-- <input type="text" placeholder="Название подзадачи" name="subtitle" />
          <input type="number" name="hours" />
          <button>Remove</button> -->
        </div>
        <a onclick="return addField()" href="#" class="default_button">Добавить подзадачу</a>
        <div class="buttons_block">
          <input type="submit" value="Сохранить в Localstorage" name="submit"  class="default_button local_button"/>
          <a href="index.php" class="default_button">Создать новую задачу</a>
        </div>
      </form>
    </div>
  </div>
  <script src="script.js"></script>
</body>

</html>