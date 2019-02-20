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
})