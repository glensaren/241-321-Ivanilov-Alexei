<form name="form_add" method="post">

    <input type="hidden" name="id" value="<?= htmlspecialchars($row['id'] ?? '') ?>">

    <div class="column">
        <div class="add">
            <label>Фамилия</label> <input type="text" name="last_name" placeholder="Фамилия" value="<?=$row['last_name'];?>">
        </div>
        <div class="add">
            <label>Имя</label> <input type="text" name="first_name" placeholder="Имя" value="<?=$row['first_name'];?>">
        </div>
        <div class="add">
            <label>Отчество</label> <input type="text" name="patronymic" placeholder="Отчество" value="<?=$row['patronymic'];?>">
        </div>
        <div class="add">
            <label>Пол</label> 
            <select name="gender">
                <option value='<?=$row['gender'];?>'><?=$row['gender'];?></option>
                <option value="М">Мужской</option>
                <option value="Ж">Женский</option>
            </select>
        </div>
        <div class="add">
            <label>Дата рождения</label> <input type="date" name="date_of_birth" value="<?=$row['date_of_birth'];?>">
        </div>
        <div class="add">
            <label>Телефон</label> <input type="text" name="phone" placeholder="Телефон" value="<?=$row['phone'];?>">
        </div>
        <div class="add">
            <label>Адрес</label><input type="text" name="address" value="<?= htmlspecialchars($row['address'] ?? '') ?>">
        </div>
        <div class="add">
            <label>Email</label> <input type="email" name="email" placeholder="Email" value="<?=$row['email'];?>">
        </div>
        <div class="add">
            <label>Комментарий</label> <textarea name="comment" placeholder="Краткий комментарий"><?=$row['comment'];?></textarea>
        </div>
    
            <button type="submit" value="<?=$button;?>" name="button" class="form-btn"><?=$button;?></button>
    </div>
    </form>