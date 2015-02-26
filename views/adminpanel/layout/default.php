<h2>Administration du site B de nikorasu et bersiroth</h2>
<div class="center">
    <span><?php echo $this->error ?></span>
    <form action="" method="GET">
        <label for="login">login : </label><input type="text" id="login" name="login"/><br>
        <label for="password">password : </label><input type="password" id="password" name="password"/>
        <input type="submit"/>
        <input type="hidden" name="addon" value="adminpanel"/>
        <input type="hidden" name="task" value="login"/>
    </form>
</div>       