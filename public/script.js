var selectedRow = null
            function addRow()
            {   // get input values
                var designation = document.getElementById('designation').value;
                var qtE = document.getElementById('qtE').value;
                var qt = document.getElementById('qt').value;
                  // get the html table
                  // 0 = the first table
                  var table = document.getElementsByTagName('table')[0];
                  // add new empty row to the table
                  // 0 = in the top 
                  // table.rows.length = the end
                  // table.rows.length/2+1 = the center
                  var newRow = table.insertRow(table.rows.length/2+1);
                  // add cells to the row
                  var cel1 = newRow.insertCell(0);
                  var cel2 = newRow.insertCell(1);
                  var  cel3 = newRow.insertCell(2);
                   var cell4 = newRow.insertCell(3);
                  // add values to the cells
                  cel1.innerHTML = designation;
                  cel2.innerHTML = qtE;
                  cel3.innerHTML = qt;
                  cell4.innerHTML = ` <a  class="btn btn-danger" onClick="onDelete(this)">-</a>`;
                  // $('tbody').on('click','deleteRow',function({
                  //   $(this).parent().parent().remove();
                  // })
                  // )
                 
            }
            function resetForm() {
    document.getElementById("designation").value = "";
    document.getElementById("qtE").value = "";
    document.getElementById("qt").value = "";
    selectedRow = null;
}

function onDelete(td) {
    if (confirm('Etes vous sur de vouloir supprimer ce produit ?')) {
        row = td.parentElement.parentElement;
        document.getElementById("employeeList").deleteRow(row.rowIndex);
        resetForm();
    }
}




