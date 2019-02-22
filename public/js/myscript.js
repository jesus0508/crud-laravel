

/**
 * Cargar modal para crear un nuevo Empleado
 */
$('#create-modal').click((e)=>{
    e.preventDefault()
    $('#createForm').trigger('reset')
    getDepartments('#departments')
    getJobs('#jobs')
})

/**
 * Guardar un empleado
 */
$('#store').click((e)=>{
    e.preventDefault()
    $.ajax({
        type:'POST',
        url:'./employees',
        data:{
            '_token': $('input[name=_token]').val(),
            'first_name' : $(`#first_name`).val(),
            'last_name' : $('#last_name').val(),
            'email' : $('#email').val(),
            'phone_number' : $('#phone_number').val(),
            'job_id' : $('#jobs').val(),
            'department_id' : $('#departments').val(),
        },
        success: (data)=>{
            sendMessage(data,'Empleado Registrado satifactoriamente')
            $('#employeeTable').append(
                `<tr id="row-${data.employee.id}">
                <td class='col1'>${$('#employeeTable').last().text().parseInt()+1}</td>
                <td>${data.employee.first_name}</td>
                <td>${data.employee.last_name}</td>
                <td>${data.employee.email}</td>
                <td>${data.employee.phone_number}</td>
                <td>${data.department.name}</td>
                <td>${data.job.title}</td>
                <td>
                    <button type="button" class="btn btn-info show-modal" data-toggle="modal" data-target="#showModal" data-id="${data.employee.id}">
                        <span class="glyphicon glyphicon-eye-open"></span>Ver
                    </button>
                </td>
                <td>
                    <button type="button" class="btn btn-secondary edit-modal" data-toggle="modal" data-target="#editModal" data-id="${data.employee.id}"> 
                        <span class="glyphicon glyphicon-edit"></span>Editar
                    </button>
                </td>
                <td>
                    <button type="button" class="btn btn-danger delete-modal" data-toggle="modal" data-target="#deleteModal" data-id="${data.employee.id}">
                        <span class="glyphicon glyphicon-trash"></span>Eliminar
                    </button>
                </td>
                </tr>`
            )
        }
    })
})

/**
 * Cargar modal para editar un Empleado
 */
$(document).on('click','.edit-modal',function(){
    let idEmployee=$(this).data('id')
    $.ajax({
        type:'GET',
        url:`./employees/${idEmployee}`,
        success:(data)=>{
            $('#first_name_edit').val(data.employee.first_name)
            $('#last_name_edit').val(data.employee.last_name)
            $('#email_edit').val(data.employee.email)
            $('#phone_number_edit').val(data.employee.phone_number)
            $('#update').data('id',idEmployee)
            getDepartments('#departments_edit')
            getJobs('#jobs_edit')
            $('#editModal').modal('show')
        }
    })
})

$('#update').click(function(e){
    e.preventDefault()
    let idEmployee=$(this).data('id')
    $.ajax({
        type: 'PUT',
        url:`./employees/${idEmployee}`,
        data:{
            '_token': $('input[name=_token]').val(),
            'first_name' : $(`#first_name_edit`).val(),
            'last_name' : $('#last_name_edit').val(),
            'email' : $('#email_edit').val(),
            'phone_number' : $('#phone_number_edit').val(),
            'job_id' : $('#jobs_edit').val(),
            'department_id' : $('#departments_edit').val(),
        },
        success: (data)=>{
            $('#createForm').trigger('reset')
            sendMessage(data,'Empleado actualizado satisfactoriamente')
        }
    })
})

/**
 * Cargar modal para mostrar un Empleado
 */
$(document).on('click','.show-modal',function(){
    let idEmployee=$(this).data('id')
    $.ajax({
        type:'GET',
        url:`./employees/${idEmployee}`,
        success:(data)=>{
            $('#full_name').text(`${data.employee.first_name} ${data.employee.last_name}`)
            $('#email_show').text(data.employee.email)
            $('#phone_number_show').text(data.employee.phone_number)
            $('#job_title_show').text(data.job.title)
            $('#deparment_name_show').text(data.department.name)
            $('#showModal').modal('show')
        }
    })
})

/**
 * Cargar modal para eliminar un Empleado
 */
$('.delete-modal').click(function(e){
    e.preventDefault()
    let idEmployee=$(this).data('id')
    $('#destroy').data('id',idEmployee)
})

$('#destroy').click(function(e){
    e.preventDefault()
    let idEmployee=$(this).data('id')
    
    $.ajax({
        type: 'POST',
        url:`./employees/${idEmployee}`,
        data: {_method: 'delete', _token :$('input[name=_token]').val()},
        success:(data)=>{
            sendMessage(data,'Empleado eliminado exitosamente')
            $(`#row-${idEmployee}`).remove()
            $('.colIndex').each(function (index) {
                $(this).html(index+1);
            });
        }
    })
})

/**
 * Carga todos las filas de la tabla Departments
 * en el combobox
 * @param id atributo del Combobox(edit or create)
 * 
 */
function getDepartments(id){
    $.ajax({
        type: 'GET',
        url:'./departments',
        success:(departments)=>{
            $(id).empty();
            $(id).append(`<option value="">--Escoja el departamento--</option>`)
            departments.forEach(department => {
                $(id).append(`<option value="${department.id}">${department.name}</option>`)
            });
        }
    })
}

/**
 * Carga todos las filas de la tabla Jobs
 * en el combobox 
 * @param id atributo del Combobox(edit or create)
 * 
 */
function getJobs(id){
    $.ajax({
        type: 'GET',
        url:'./jobs',
        success: (jobs)=>{
            $(id).empty();
            $(id).append(`<option value="">--Escoja el departamento--</option>`)
            jobs.forEach(job=>{
                $(id).append(`<option value="${job.id}">${job.title}</option>`)
            })
        }
    })
}

/**
 * Enviar Notificaciones al usuario
 */
function sendMessage(data,message){
    if(data.errors){
        toastr.error('Ocurrio un Error!', 'Error Alert', {timeOut: 5000});
    }else{
        toastr.success(message, 'Success Alert', {timeOut: 5000});
    }
}




/*
$('#btnSearch').click((e) => {
    e.preventDefault()
    let name = $('#name').val();
    $.ajax({
        url: `/employees/${name}`,
        type: 'GET',
        success: (response) => {
            console.log(response)
            //buildTable(response.employee);
        }
    })
})

const buildTable = (response) => {
    let table = document.getElementsByTagName('tbody')[0]
    let contentTable = ''
    response.forEach(employee => {
        contentTable += `<tr>
        <td>${employee.id}</td>
        <td>${employee.first_name}</td>
        <td>${employee.last_name}</td>
        <td>${employee.email}</td>
        <td>${employee.phone_number}</td>
        <td><a class="btn btn-info" href="employees/${employee.id}">Ver</a></td>
        <td><a class="btn btn-secondary" href="employees/${employee.id}/edit">Editar</a></td>
        <td><a class="btn btn-secondary" href="employees/${employee.id}" id="delete">Delete</a></td>
        </tr>`
    });
    table.innerHTML = contentTable;
}

$('#delete').click((e)=>{
    e.preventDefault()
    let name=$('')
})*/