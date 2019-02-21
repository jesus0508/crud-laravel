//Modal Mostrar
$('#show-modal').click((e)=>{
    e.preventDefault()
    getEmployee(id)
    getDepartments()
    getJobs()
})


//Modal Editar
$('#edit-modal').click((e)=>{
    e.preventDefault()
    getEmployee(id)
    getDepartments()
    getJobs()
})

//Modal Crear
$('#create-modal').click((e)=>{
    e.preventDefault()
    getDepartments()
    getJobs()
})

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
            $('#createForm').trigger('reset')
            sendMessage(data)
            //$('#employeeTable').prepend("<tr class='item" + data.id + "'><td class='col1'>" + data.id + "</td><td>" + data.title + "</td><td>" + data.content + "</td><td class='text-center'><input type='checkbox' class='new_published' data-id='" + data.id + " '></td><td>Just now!</td><td><button class='show-modal btn btn-success' data-id='" + data.id + "' data-title='" + data.title + "' data-content='" + data.content + "'><span class='glyphicon glyphicon-eye-open'></span> Show</button> <button class='edit-modal btn btn-info' data-id='" + data.id + "' data-title='" + data.title + "' data-content='" + data.content + "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-title='" + data.title + "' data-content='" + data.content + "'><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");
        }
    })
})

//Modal Delete
$('#edit-modal').click((e)=>{
    e.preventDefault()
    console.log(getEmployee($('destroy').data('id')))
    $('#deleteModal').modal('show')
})

function getDepartments(){
    $.ajax({
        type: 'GET',
        url:'./departments',
        success:(departments)=>{
            departments.forEach(department => {
                $('#departments').append(`<option value="${department.id}">${department.name}</option>`)
            });
        }
    })
}

function getJobs(){
    $.ajax({
        type: 'GET',
        url:'./jobs',
        success: (jobs)=>{
            jobs.forEach(job=>{
                $('#jobs').append(`<option value="${job.id}">${job.title}</option>`)
            })
        }
    })
}

function getEmployee(id){
    $.ajax({
        type:'GET',
        url:`/employees/${id}`,
        success:(employee)=>{
            $(`#first_name`).val(employee.first_name)
            $('#last_name').val(employee.last_name)
            $('#email').val(employee.email)
            $('#phone_number').val(employee.phone_number)
        }
    })
}

function sendMessage(data){
    if(data.errors){
        toastr.error('Error en la validacion!', 'Error Alert', {timeOut: 5000});
    }else{
        toastr.success('Usuario registrado!', 'Success Alert', {timeOut: 5000});
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