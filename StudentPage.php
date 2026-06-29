<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Профиль студента</title>
    <link rel="stylesheet" href="class/style.css"> 
</head>
<body class="page">

    <div class="profile-wrapper" style="flex-direction: column; align-items: center; padding: 40px;">
        <?php if (!empty($current_student)): ?>
            
            <h1 class="page-header__title" style="margin-bottom: 20px;">Карточка студента №<?= (int)$current_student['id'] ?></h1>
            




                <?php if ((int)$current_student['id'] === 13): ?>
                    <div class="profile-avatar-wrapper">
                        <img src="marvey/Matvey.jpg" alt="Фото Матвея" class="student-avatar">
                    </div>
                <?php endif; ?>
           

            <div class="table-container" style="width: 100%; max-width: 800px;">
                <table class="info-table"> 
                    <thead class="info-table__head">
                        <tr class="info-table__row">
                            <th class="info-table__cell info-table__cell--header">Студент</th>
                            <th class="info-table__cell info-table__cell--header">Направление</th>
                            <th class="info-table__cell info-table__cell--header">Прогресс</th>
                            <th class="info-table__cell info-table__cell--header">Статус</th>
                        </tr>
                    </thead>
                    <tbody class="info-table__body">
                        <tr class="info-table__row">
                            <td class="info-table__cell" style="font-weight: bold;"><?= htmlspecialchars($current_student['Student']) ?></td>
                            <td class="info-table__cell"><?= htmlspecialchars($current_student['Department']) ?></td>
                            <td class="info-table__cell"><?= htmlspecialchars($current_student['Progres']) ?> %</td>
                            <td class="info-table__cell"><?= htmlspecialchars($current_student['Status']) ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>

        <?php else: ?>
            <div class="student-card" style="text-align: center;">
                <h2>Студент не найден</h2>
                <p>Записи с таким идентификатором нет в БД.</p>
            </div>
        <?php endif; ?>
        
        <a href="index.php" class="back-btn" style="margin-top: 30px; color: #000000;"> Назад</a>
    </div>

</body>
</html>
