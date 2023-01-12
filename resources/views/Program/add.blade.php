@extends('Layout.Admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card mx-5" style="padding-top:5%">
                <div class="card-header">
                    <h3>Quality Assurance Form</h3>
                </div>
                <div class="card-body">
                    <form id="add_form">
                    @csrf
                    <div class="mb-3">
                        <label for="program_name">Program Name:</label>
                        <input type= "text" id="program_name" name="program_name" class="form-control">
                        </div>
                    <div class="mb-3">
                        <label for="level_accreditation">Level of Accreditation: </label>
                        <input type="text" id="level_accreditation" name="level_accreditation" class="form-control">
                    </div>
            
                    <div class="mb-3">
                        <label for="from_date">Date of Validity:</label>
                        <input type= "date" id="from_date" name="from_date" class="form-control">-<input type= "date" id="to_date" name="to_date" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="remarks">Remarks:</label>
                        <input type= "text" id="remarks" name="remarks" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="campus">Campus:</label>
                        <Select name="campus" id="campus">
                        <option> -->Choose Campus<--</option>
                        <option value="batac">City of Batac Campus</option>
                        <option value="laoag">Laoag Campus</option>
                        <option value="curimao">Curimao Campus</option>
                    </select>
                    </div>

                    <div class="mb-3">
                         <label for="level">Level:</label>
                        <Select name="level" id="level">
                        <option> Choose Graduate Level</option>
                        <option value="graduate">Graduate</option>
                        <option value="undergraduate">Undergraduate</option>
                    </select>
                
                </div>

                <div >
                <button  style="width: 200px; text-align:center; background-color:green;color:white; margin-left:300px; margin-top:20px;" onclick="Save_Program(event)">Save</button>
                    </div>             
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('inline_script')
<script>
function Save_Program(event){
    event.preventDefault();
        
            $.post('/Quality-Assurance/Program-Status/Save-Program',$("#add_form").serializeArray()).then((data)=>{
                if(data){
                    window.location.href = '/Quality-Assurance/Admin/Program-Accreditations';
                }
            });
        }
</script>
@endsection