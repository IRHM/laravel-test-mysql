const sortHeaderStates = {
    0: true,
    1: true,
    2: true,
    3: true,
};

function getCsrfToken() {
    return document.querySelector('meta[name="csrf-token"]').content;
}

async function deleteData(id) {
    const response = await fetch(`data/delete/${id}`, {
        method: "DELETE",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": getCsrfToken(),
        },
    });
}

function sortTable(ci) {
    const table = document.getElementById("dataTable");
    const tableBody = table.querySelector("tbody");
    const rows = tableBody.querySelectorAll("tr");

    const newRows = Array.from(rows);

    // Sort rows by the content of cells
    newRows.sort(function (rowA, rowB) {
        const a = rowA.querySelectorAll("td")[ci].innerHTML;
        const b = rowB.querySelectorAll("td")[ci].innerHTML;

        if (sortHeaderStates.ci) {
            switch (true) {
                case a > b:
                    return 1;
                case a < b:
                    return -1;
            }
        } else {
            switch (true) {
                case a < b:
                    return 1;
                case a > b:
                    return -1;
            }
        }

        if (a === b) return 0;
    });

    // Flip sortHeaderState for index just sorted
    sortHeaderStates.ci = !sortHeaderStates.ci;

    // Remove old rows
    [].forEach.call(rows, function (row) {
        tableBody.removeChild(row);
    });

    // Append new row
    newRows.forEach(function (newRow) {
        tableBody.appendChild(newRow);
    });
}
