<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редактирование студента</title>
    <link rel="stylesheet" href="class/style.css">
</head>
<body class="page"> 
    <main class="page__container" style="display: flex; flex-direction: column; align-items: center; padding: 40px;">
        
        <section class="content-section" style="width: 100%; max-width: 500px;">
            <h2 class="content-section__title1" style="text-align: center; margin-bottom: 20px;">Редактирование студента №<?= (int)$current_student['id'] ?></h2>
            <div class="table-container1">
                
                <form class="feedback-form1" method="POST" action="index.php?action=edit&id=<?= (int)$current_student['id'] ?>">
                    <input type="hidden" name="student_id" value="<?= (int)$current_student['id'] ?>">
                    
                    <div class="feedback-form__group1">
                        <label class="feedback-form__label" for="student">Студент (ФИО)</label>
                        <input class="feedback-form__input" type="text" id="student" name="Student" value="<?= htmlspecialchars($current_student['Student']) ?>" required>
                    </div>
                    <div class="feedback-form__group1">
                        <label class="feedback-form__label" for="direction">Направление</label>
                        <input class="feedback-form__input" type="text" id="direction" name="Department" value="<?= htmlspecialchars($current_student['Department']) ?>" required>
                    </div>
                    <div class="feedback-form__group1">
                        <label class="feedback-form__label" for="progress">Прогресс (%)</label>
                        <input class="feedback-form__input" type="number" step="0.01" id="progress" name="Progres" value="<?= htmlspecialchars($current_student['Progres']) ?>" required>
                    </div>
                    <div class="feedback-form__group1">
                        <label class="feedback-form__label" for="status">Статус</label>
                        <input class="feedback-form__input" type="text" id="status" name="Status" value="<?= htmlspecialchars($current_student['Status']) ?>" required>    
                    </div>
                    
                    <button class="feedback-form__button" type="submit" name="update_student" style="width: 100%; margin-top: 15px;">Сохранить изменения</button>
                </form>
            </div>
        </section>

        <a href="index.php" class="back-btn" style="margin-top: 20px;">← отменить вернуться назад</a>

    </main>
</body>
</html>
