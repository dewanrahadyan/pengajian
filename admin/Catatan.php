 Jika departmen bisa di input atau ditambah lagi
 <div class="form-group">

                           <?php 
                                  //while($data=mysqli_fetch_array($tampilDepartemen))
                                  //{  
                                   // echo "'".$data['kd_dept']."'>".$data['departemen'];
                                  //}
                                  ?>
                    
                              <label class="col-sm-2 col-sm-2 control-label">Departemen</label>
                              <div class="col-sm-10">

                                <select name="kd_dept" id="kd_dept" placeholder="Departemen" class="form-control" required>
                                  

                                  <?php 
                                  while($data=mysqli_fetch_array($tampilDepartemen))
                                  {  
                                    echo "<option value='".$data['kd_dept']."'>".$data['departemen']."</option>";
                                  }
                                  ?>
                    
                                </select>
                                                        
                              </div>
                          </div>