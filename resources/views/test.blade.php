<script>
var i = 0;
    $("#dynamic-ar").click(function () {
        ++i;
        $("#dynamicAddRemove").append('<tr><td> <select class="custom-select mr-sm-2" id="designation" name="addMoreInputFields[0]designation[]"  required ><option value="">Veuillez sélectionner!</option><?php   foreach ($stock_cur as $app):   ?><option value="<?= $app["designation"]?>" id="designation" label="<?= $app["designation"]?>"  name="designation"><?= $app["qt"]?></option> <?php endforeach; ?></select>	</td><td><input type="text" name="addMoreInputFields[' + i +
            '][qtE]" placeholder="Enter subject" class="form-control" /></td><td><input type="text" name="addMoreInputFields[' + i +
            '][qt]" placeholder="Enter subject" class="form-control" /></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
            );
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });
</script>