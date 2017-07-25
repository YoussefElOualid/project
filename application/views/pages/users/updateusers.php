<section class="panel">
    <div class="panel-heading">
        <h3>
            <h4>liste des utilisateurs </h4>
        </h3>
    </div>
    <div class="panel-body">
        <div align="right">
            <button type="button" name="add" id="add" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-warning">Ajouter</button>
        </div>
        <div class="row">
            <div class="col-lg-12">
                
                <br />
                <div class="margin-bottom-50">
                    <table class="table table-striped defualt" id="example1" width="100%">
                        <thead>
                            <tr>
                                <th>Nom d'utilisateur</th>
                                <th>Email d'utilisateur</th>

                                <th>Type d'utilisateur</th>
                                <th>Bank</th>
                                <th>Modifier</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <?php  foreach ($DataToPage["agence"] as $key => $u) { ?>
                                    <td>
                                        <?=$u->userName?>
                                    </td>
                                    <td>
                                        <?=$u->userEmail?>
                                    </td>

                                    <td>
                                        <?=$u->type_user?>
                                    </td>
                                    <td>
                                        <?=$u->bank_label?>
                                    </td>


                                    <td>
                                        <input type="button" name="edit" value="Modifier" data-edit='<?=json_encode($u)?>' id="<?=$u->userId?>" class="btn btn-info btn-xs edit_data" />
                                    </td>
                                    <!--  <input type="hidden" name="idusers" value="$u->userId"> -->
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div id="add_data_Modal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Liste USERS</h4>
                    </div>
                    <div class="modal-body">
                        <form method="post" id="insert_form" onsubmit="return GO(this);">
                            <input type="hidden" id="rowid" name="rowid" value="" />
                            <label>Nom users</label>
                            <input type="text" name="nomuser" id="nomuser" class="form-control" required />
                            <br />

                            <label>login</label>
                            <input type="text" name="login" id="login" class="form-control" required />
                            <br />

                            <label>Email users</label>
                            <input type="text" name="email" id="email" class="form-control" required />
                            <br />

                            <label>mot de passe</label>
                            <input name="pass" type="text" id="pass" class="form-control" required />
                            <br />
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-home
                "></span></span>
                                <select class="form-control seltype" id="typeuser" name="type">
                            <option  value="admin">Utilisateur FinaCards</option>
                            <option  value="user">Banque utilisateurs</option>
                                </select>
                            </div>
                            
                            <input type="hidden" name="typeSelectuser" value="0">
                            <span class="text-danger"><?php echo ''; ?></span>
                            <br />

                            <?php if(empty($this->session->userdata("isUserBank"))){ ?>
                                <label>Banque</label>
                                <select class="form-control viewbank" style="display: none;" id="sel" name="bank_code_country" required>
                                    <option value="">sélectionner une banque:</option>
                                    <?php foreach($DataToPage["banks"] as $row):; ?>
                                      <!--  <option value="<?=$row//->bank_code.'|'.$row->bank_country?>">
 -->                                        <option value="<?=$row->rowid.'|'.$row->bank_label?>">

                                            <?php echo $row->bank_label; ?>
                                        </option>
                                        <?php endforeach; ?>

                                </select>
                                <?php } ?>

                                    <br />
                                    <input type="hidden" name="bank_id" id="bank_id" />
                                    <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />
                                    <input type="reset" name="insert" id="" value="reset" class="btn btn-success hide" />

                        </form>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            function GO($ele) {
              
                $.ajax({
                    url: "<?= base_url()?>getinsertUtlisateur",
                    method: "POST",
                    data:$('#insert_form').serialize(),
                    // data: $data,
                    
                    beforeSend: function() {
                        $('#insert').val("Inserting");
                    },
                    success: function(data) {
                        $('#insert_form')[0].reset();
                    location.reload();
                        $('#add_data_Modal').modal('hide');
                        $('#dataTables-example').html(data);
                        $('#dataTables-example').DataTable().clear().destroy();
                        $('#dataTables-example').DataTable({
                            responsive: true,
                            language: {
                                "url": "../content/French.json"
                            }
                        });
                    }
                });

                return false;
            }

                var data ;
            $(document).ready(function(){


                $('body').on('click', '.add', function(){
                    $('[type="reset"]').click()
                   })

                $(document).on('click', '.edit_data', function(){
                    $('#add_data_Modal').modal()
                    data = JSON.parse($(this).attr('data-edit'))
                    console.log()
                    $('#rowid').val(data.userId);
                    $('#nomuser').val(data.userName);
                    $('#email').val(data.userEmail);
                    $('#login').val(data.userLogin);
                    $('#pass').val(data.userPass);
                    $('#type').val(data.type_user);
                     $('#bank_code_country').val(data.bank_label);
                    $('[name="bank_code_country"]').val(data.bank_code+'|'+data.country_code);

                    $('#insert').val("Update").removeClass('btn-success').addClass('btn-primary');
                });
                });

            // var bank_id = $(this).attr("id");
            // $.ajax({
            // url:"UpdateListBank.php",
            // method:"POST",
            // data:{},
            // dataType:"json",
            // success:function(data){
            // $('#label').val(data.label);
            // $('#codeAg').val(data.codeAg);
            // $('#codeV').val(data.codeV);
            // $('#country_code').val(data.country_code);

            // $('#bank_id').val(data.id);
            // $('#insert').val("Update");
            // $('#add_data_Modal').modal('show');
            // }
            // });
            // });
            // });
            $('.viewbank').hide().removeAttr('required');
            $('.seltype').on('change',function() {
                    if($(this).val() == 'admin'){
                        $('.viewbank').hide().removeAttr('required');
                    }else{
                        $('.viewbank').show().attr('required',true);                        
                    }
            })
        </script>