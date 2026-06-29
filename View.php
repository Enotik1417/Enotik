<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Моя первая тренировочная страница</title>
    <link rel="stylesheet" href="class/style.css">
</head>
<body class="page"> 

    <header class="page-header">
        <h1 class="page-header__title">Моя первая тренировочная страница</h1>
        <p class="page-header__subtitle">Здесь собраны все базовые элементы веб-интерфейса. Изучай код, меняй свойства и тренируйся!</p>
    </header>

    <main class="page__container">
        
        <section class="content-section">
            <h2 class="content-section__title">1. Карточки (Profile & Product Cards)</h2>
            <div class="card-grid">
                <article class="user-card">
                    <h3 class="user-card__title">Алексей Иванович</h3>
                    <span class="user-card__badge">Frontend Разработчик</span>
                    <p class="user-card__text">Учусь верстать сайты, люблю структурированный код, горячий чай и пушистых котиков.</p>
                    <button class="user-card__button">Подписаться</button>
                </article>
                <article class="product-card">
                    <h3 class="product-card__title">Беспроводные наушники</h3>
                    <p class="product-card__text">С активным шумоподавлением, влагозащитой и мощным басом. До 30 часов работы.</p>
                    <button class="product-card__button">В корзину</button>
                </article>
            </div>
        </section>

        <section class="content-section">
            <h2 class="content-section__title">2. Секция "Преимущества" (Grid / Flexbox)</h2>
            <div class="features-grid">
                <div class="features-grid__item">
                    <h4 class="features-grid__item-title">Быстрая доставка</h4>
                    <p class="features-grid__item-text">Доставим ваш заказ прямо до двери в течение 30 минут после оформления.</p>
                </div>
                <div class="features-grid__item">
                    <h4 class="features-grid__item-title">Гарантия качества</h4>
                    <p class="features-grid__item-text">Все товары проходят строгий контроль. Вернем деньги, если вас что-то не устроит.</p>
                </div>
                <div class="features-grid__item">
                    <h4 class="features-grid__item-title">Поддержка 24/7</h4>
                    <p class="features-grid__item-text">Наша дружелюбная служба заботы всегда на связи и готова помочь в любой ситуации.</p>
                </div>
            </div>
        </section>

        <section class="content-section">
            <h2 class="content-section__title">3. Информационная таблица (Table)</h2>
            <div class="table-container">
                <table class="info-table"> 
                    <thead class="info-table__head">
                        <tr class="info-table__row">
                            <th class="info-table__cell info-table__cell--header">Студент</th>
                            <th class="info-table__cell info-table__cell--header">Направление</th>
                            <th class="info-table__cell info-table__cell--header">Прогресс</th>
                            <th class="info-table__cell info-table__cell--header">Статус</th>
                            <th class="info-table__cell info-table__cell--header">Действие</th>
                        </tr>
                    </thead>
                    <tbody class="info-table__body">
                        <?php $this->Print_Table_Content($students_data); ?>
                    </tbody>
                </table>
            </div>
        </section>
 
        <section class="content-section">
            <h2 class="content-section__title1">3.1 Информационная таблица (Table/Forms)</h2>
            <div class="table-container1">
                
                <form class="feedback-form1" method="POST" action="">
                    <input type="hidden" name="target_table" value="informatietable">
                    
                    <div class="feedback-form__group1">
                        <label class="feedback-form__label" for="student">Студент</label>
                        <input class="feedback-form__input" type="text" id="student" name="Student" required>
                    </div>
                    <div class="feedback-form__group1">
                        <label class="feedback-form__label" for="direction">Направление</label>
                        <input class="feedback-form__input" type="text" id="direction" name="Department" required>
                    </div>
                    <div class="feedback-form__group1">
                        <label class="feedback-form__label" for="progress">Прогресс</label>
                        <input class="feedback-form__input" type="number" step="0.01" id="progress" name="Progres" required>
                    </div>
                    <div class="feedback-form__group1">
                        <label class="feedback-form__label" for="status">Статус</label>
                        <input class="feedback-form__input" type="text" id="status" name="Status" required>    
                    </div>
                    
                    <button class="feedback-form__button" type="submit" name="add_student">Отправить</button>
                </form>
            </div>
        </section>

        <section class="content-section">
            <h2 class="content-section__title">4. Форма обратной связи (Form Inputs)</h2>
            <form class="feedback-form" method="POST" action="">
                <div class="feedback-form__group">
                    <label class="feedback-form__label" for="name">Ваше имя</label>
                    <input class="feedback-form__input" type="text" id="name" name="user_name" required>
                </div>
                <div class="feedback-form__group">
                    <label class="feedback-form__label" for="email">Email</label>
                    <input class="feedback-form__input" type="email" id="email" name="user_email" required>
                </div>
                <div class="feedback-form__group">
                    <label class="feedback-form__label" for="message">Ваше сообщение</label>
                    <textarea class="feedback-form__input" id="message" name="user_message" rows="4" required></textarea>
                </div>
                <button class="feedback-form__button" type="submit" name="send_feedback">Отправить</button>
            </form>
        </section>

    </main>
</body>
</html>
