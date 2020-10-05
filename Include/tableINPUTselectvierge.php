<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($fc as $cf) {
            ?>
            <tr>              
                <th scope="row"></th>
                <td></td>
            </tr>
            <?php
        }
//                
        ?>
    </tbody>
</table>
<!--//---------------------------------------------------------------------------->
<!--input avec recuperation et message d'erreur-->
<div>
    <label for=""></label>
    <input type="" name="" value="<?= isset($_POST['']) ? $_POST[''] : '' ?>" id=""/>
    <p class="text-danger" id="Error"><?= isset($formError['']) ? $formError[''] : '' ?></p>
</div>
<!--Selcet ac message d'erreur et foreach-->
<div>
    <label>Sélectionnez  dans la liste suivante :*</label><br>
    <select class="custom-select custom-select-sm" name="" id="">
        <option selected="">Choissez dans la liste suivante </option>
        <?php
        foreach ($a as $b) {
            ?>
            <option value="<?= $b->id ?>"> <?= $b->c ?></option>
            <?php
        }
        ?>
    </select>
    <p class="text-danger"><?= isset($formError['']) ? $formError[''] : '' ?></p>
</div>
<!--------------------------------------------------------->