@extends('panelViews::mainTemplate')
@section('page-wrapper')

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><i class="fa fa-gears"></i> &nbsp; Setting </h1>
                </div>
            </div>
            <!-- /.row -->

            <style>
                table {
                    font-family: arial, sans-serif;
                    border-collapse: collapse;
                    width: 100%;
                }

                td, th {
                    border: 1px solid #dddddd;
                    text-align: center;
                    padding: 8px;
                }

                tr:nth-child(even) {
                    background-color: #dddddd;
                }

                .table-wrapper-scroll-y {
                    display: block;
                    max-height: 200px;
                    overflow-y: auto;
                    -ms-overflow-style: -ms-autohiding-scrollbar;
                }

                #myTable tr:hover {
                    background-color:#ccffcc;
                }

            </style>

            <div class="table-wrapper-scroll-y" style="max-height: 590px;">

                <table id="myTable"class="table table-bordered table-striped">
                    <tr style="font-size:20px;">
                        <th id="th_key" style="width:10%;">Key</th>
                        <th id="th_category" style="width:25%;">Category</th>
                        <th style="width:10%;">Status</th>
                        <th>Advertiser</th>
                        <th style="width:5%;">Action</th>
                    </tr>

                    <tr id="row2">
                      <td>
                        <select id="add_key" style="padding: 10.5%;width: 100%;">
                          <option selected disabled>Key</option>
                          <?php
                            $keys = \DB::select('SELECT * FROM tbl_keys');
                            foreach ($keys as $value) {
                              echo '<option value="'.$value->key_lbl.'">'.$value->key_lbl.'</option>';
                            }
                          ?>
                        </select>
                      </td>
                      <td>
                        <select id="category" style="padding: 4.4%;width: 100%;">
                          <option selected disabled>Choose Category</option>
                          <?php
                            $array_advertiser = array();
                            for($i=0;$i<sizeof($params[1]);$i++){
                                array_push($array_advertiser,$params[1][$i]);
                            }
                            sort($array_advertiser);
                            for($j=0;$j<sizeof($array_advertiser);$j++){
                                echo '<option value="'.$array_advertiser[$j].'">'.$array_advertiser[$j].'</option>';
                            }
                          ?>
                        </select>
                      </td>
                      <td>
                        <select id="Join_value" style="padding: 12%;width: 100%;">
                          <option value="100">All</option>
                          <option value="101">Joined</option>
                          <option value="102">Not Joined</option>
                        </select>
                      </td>
                      <td><input id="advertiser_id_input" style="padding:1%; width:100%;"></input></td>
                      <td> <i id="save" class="material-icons save" style="cursor: pointer;margin-top:15px;" data-toggle="tooltip" title="Add Category">add</i> </td>
                    </tr>
                    <?php
                    foreach ($paramss as $value) {
                        $param4 = $value->advertiser;
                        $param4 = str_replace(" ","",$param4);
                        $param4 = str_replace("http","  http",$param4);
                        $param4 = str_replace("https","  https",$param4);
                        echo '<tr id="'.$value->id.'">';
                        echo '<td> <input placeholder="Key" style="padding: 11.5%;width: 100%;" value="'.$value->davis_key.'" readonly></input> </td>';
                        echo '<td> <input style="padding: 4.4%;width: 100%;" value="'.$value->category.'" readonly></input> </td>';
                        echo '<td> <input style="padding: 12%;width: 100%;" value="'.$value->status.'" readonly></input> </td>';
                        echo '<td style="text-align:left;">';
                        if($param4 == ""){
                            $increase = 1;
                            foreach ($params[2] as $key => $v) {
                                if($value->category == $v['parent'] || $value->category == $v['child']){
                                if(fmod($increase,5)==0){$n="</br>";} else {$n="";} if(fmod($increase,2)==0) { $color = "color:#23527c;"; } else { $color = "color:#000000;"; }
                                echo '<a style="'.$color.'" target="_blank" href = "'.$key.'">'.$key.'</a>&nbsp;&nbsp;&nbsp;'.$n.'';
                                $increase++;
                                }
                            }
                        } else {
                            if (strlen($param4) <= 144){
                                echo '<a>'.$param4.'</a>';
                            } else {
                                $advertiser_len = strlen($param4);
                                if($advertiser_len>=round($advertiser_len/144, 0, PHP_ROUND_HALF_EVEN)*144) {
                                    for ($l=1;$l<=round($advertiser_len/144, 0, PHP_ROUND_HALF_EVEN)+1;$l++){
                                        echo '<a>'.substr($param4,144*($l-1),143).'</a><br>';
                                    }
                                } else {
                                    for ($l=1;$l<=round($advertiser_len/144, 0, PHP_ROUND_HALF_EVEN);$l++){
                                        echo '<a>'.substr($param4,144*($l-1),143).'</a><br>';
                                    }
                                }
                            }                            
                        }
                          echo '</td>
                            <td> <i id="delete" class="material-icons delete" style="cursor: pointer;margin-top:15px;" data-toggle="tooltip" title="Delete Category">delete</i></td>
                          </tr>';
                      }
                      ?>
                </table>
            </div>

            <div>
                </br>
                <label for="exampleInputEmail1" style="font-size: 25px; margin-left:1%;"><li class="fa fa-key"></li>&nbsp;&nbsp; CJ API Key </label>
                
                <?php foreach($params[0] as $user)
                  echo '<input type="email" class="form-control" id="exampleInputEmail1_input" style="background-color: white !important;width: 100%;
  padding: 12px 20px; margin: 8px 0; box-sizing: border-box;" value="'.$user->cj_key.'"'.' >';
                ?>
            </div>
            <span style="font-size: 23px;margin-left:1%;"><i style="cursor: pointer;" id="save_cj_key" class="material-icons" data-toggle="tooltip" title="Save CJ API KEY">save</i></span>
@stop
