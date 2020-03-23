<div class="container">
    <h1>Testing / Debug</h1>
    <?php var_dump($users ?? '<a href="'.FLROOT.'/user">/index.php/user</a>') ?><br><br>
    <?php var_dump($user ?? '<a href="'.FLROOT.'/stuff">/index.php/stuff</a>') ?> <br><br>
    <?php var_dump($user ?? '<a href="'.FLROOT.'/update">/index.php/update</a>') ?> <br><br>
    <?php var_dump($user ?? '<a href="'.FLROOT.'/new_user">/index.php/new_user</a>') ?> <br><br>

    <p>Yay for debug links!!!</p>
    
</div>