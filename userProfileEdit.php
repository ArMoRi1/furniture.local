<?php
include('header.php');

?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
<div class="userProfileEdit-wrapper wrapper">
    <div class="userProfileEdit-container container">
        <div class="userProfileEdit-body">
            <form action="userProfile/userProfileAction.php" method="post" enctype="multipart/form-data" style="text-align: left">
                <div class="form-group ">
                    <label for="exampleFormControlFile1">Змінити фото профілю</label>
                    <div  class="userInfo-left">
                        <div class="userPhoto userPhotoEdit">
                            <?php if(empty($_SESSION['avatar'])):?>
                                <img src="img/database/usersAvatars/userImg-basic.png" alt="#" >
                            <?php endif;?>
                            <?php if(!empty($_SESSION['avatar'])):?>
                                <img src="<?=$_SESSION['avatar']?>" alt="#" accept="image/jpeg,image/png,image/gif">
                            <?php endif;?>
                        </div>
                        <label class="userPhoto-hidden">
                            <i class="fa-solid fa-folder-open"></i>
                            <span>Виберіть фото</span>
                            <input name="imgProfile" class ="imgProfile" type="file" id="exampleFormControlInput1">
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlFile1">Змінити Прізвище</label>
                    <input name="usersurname" type="text" class="form-control" id="exampleFormControlFile1"
                           value="<?=$_SESSION['usersurname']?>" required>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Змінити ім'я</label>
                    <input name="username" type="text" class="form-control" id="exampleFormControlFile1"
                           value="<?=$_SESSION['username']?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Редагувати профіль</button>
                <a href="userProfile.php" class="btn btn-secondary">Скасувати</a>
            </form>
        </div>
    </div>
</div>

<?php
include('footer.php');
?>
