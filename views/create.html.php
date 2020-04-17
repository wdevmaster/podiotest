

<form method="post" action="<?php echo url_for('items/store'); ?>">
    <h2 class="text-center">Table</h2>
    <?php 
        if(count($flash) != 0): 
            foreach ($flash as $key => $value):
    ?>
        <div class="alert alert-<?= $key ?>" role="alert">
                <?= $value ?>
        </div>
    <?php
            endforeach; 
        endif; 
    ?>
    <div class="form-group">
        <input class="form-control" type="text" name="firstname" required placeholder="Nombre" autocomplete="off">
    </div>
    <div class="form-group">
        <input class="form-control" type="text" name="lastname" required placeholder="Apellido" autocomplete="off">
    </div>
    <div class="form-group">
        <input class="form-control" type="text" name="email" required placeholder="Email">
    </div>
    <div class="form-group">
        <input class="form-control" type="number" name="age" required placeholder="Edad" autocomplete="off">
    </div>
    <div class="form-group">
        <select class="form-control" name="sex" required>
            <option value="">Sexo</option>
            <option value="Mujer">Mujer</option>
            <option value="Hombre">Hombre</option>
        </select>
    </div>
    <div class="form-group">
        <button class="btn btn-primary btn-block" type="submit">Enviar</button>
    </div>
</form>