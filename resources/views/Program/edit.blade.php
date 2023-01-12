@extends('Layout.Admin')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
        <div class="card mx-5" style="padding-top:5%">
                <div class="card-header">
                    <h3>Quality Assurance Form</h3>
                </div>
         <div class="card-body">
        <form id="edit_form">
        @csrf
        <input type="text" name="id" value="{{$Edit_Program->id}}" hidden>
        
        <div class="mb-3">
            <label for="program_name">Program Name:</label>
            <input type= "text" id="program_name" name="program_name"  class="form-control" value="{{$Edit_Program->program_name}}">
        </div>
        <div class="mb-3">
            <label for="level_accreditation">Level of Accreditation: </label>
            <input type="text" id="level_accreditation" name="level_accreditation" class="form-control" value="{{$Edit_Program->level_accreditation}}">
        </div>
        
        <div class="mb-3">
            <label for="from_date">Date of Validity:</label>
            <input type= "date" id="from_date" name="from_date"  class="form-control" value="{{$Edit_Program->from_date}}">
            <input type= "date" id="to_date" name="to_date"  class="form-control" value="{{$Edit_Program->to_date}}">
        </div>
        <br>
        <div class="mb-3">
            <label for="remarks">Remarks:</label>
            <input type= "text" id="remarks" name="remarks"  class="form-control" value="{{$Edit_Program->remarks}}">
        </div>

        <div class="mb-3">
            <label for="campus">Campus:</label>
            <Select name="campus" id="campus"  value="{{$Edit_Program->campus}}">
            <option> {{$Edit_Program->Campus}}</option>
            <option value="batac">City of Batac Campus</option>
            <option value="laoag">Laoag Campus</option>
            <option value="curimao">Curimao Campus</option>
            </select>
            
        </div>
        <div class="mb-3">
            <label for="level">Level:</label>
            <Select name="level" id="level"  value="{{$Edit_Program->level}}" required>
            <option> {{$Edit_Program->level}}</option>
            <option value="graduate">Graduate</option>
            <option value="undergraduate">Undergraduate</option>
            </select>
            
        </div>

        <div >
        <button  style="width: 200px; text-align:center; background-color:green;color:white; margin-left:30%;" onclick="Edit_Program(event)">Save</button>
        </div>
    </form>
</div>
</div>
</div>
</div>
@endsection

@section('inline_script')
<script>
function Edit_Program(event){
        event.preventDefault();
        
            $.post('/Quality-Assurance/Program-Status/Save-Edit-Program',$("#edit_form").serializeArray()).then((data)=>{
                if(data){
                    window.location.href = '/Quality-Assurance/Admin/Program-Accreditations';
                }
            });
        }
</script>
@endsection
