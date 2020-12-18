<?php
class Constant {
    public static $firstNameCharacters = "Ваше имя короче 2-х символов илибольше 25";
    public static $lastNameCharacters = "Ваша фамилия короче 2-х символов или больше 25";
    public static $userNameCharacters = "Имя пользователя короче 2-х символов или больше 25";
    public static $userNameTaken = "Имя пользователя уже существует";
    public static $emailDontMatch = "Адреса почты не совпадают";
    public static $emailInvalid = "Не корректный адрес почты";
    public static $emailTaken = "Такая почта уже существует";
    public static $passowrdDontMatch = "Пароли не совпадают";
    public static $passwordWrongLenth = "Длина пароля не менее 5-и и не более 25 символов";
    public static $loginFailed = "Имя пользователя или пароль не верны";
}
?>