function getCircuits() {
    fetch('http://localhost:8888/REST-API-FORMULA1/circuits')
        .then(response => response.json())
        .then(data => {
            let circuitsTable = document.getElementById("circuits__table--body");
            data.forEach(circuit => {
                let circuitsList = document.createElement("tr");
                let circuitListName = document.createElement('td');
                circuitListName.textContent = `${circuit.name}`;
                circuitsList.appendChild(circuitListName);
                let circuitListCountry = document.createElement('td');
                circuitListCountry.textContent = `${circuit.country}`;
                circuitsList.appendChild(circuitListCountry);
                let circuitListLength = document.createElement('td');
                circuitListLength.textContent = `${circuit.length}`;
                circuitsList.appendChild(circuitListLength);
                let circuitListNumberOfTurns = document.createElement('td');
                circuitListNumberOfTurns.textContent = `${circuit.numberOfTurns}`;
                circuitsList.appendChild(circuitListNumberOfTurns);
                circuitsTable.appendChild(circuitsList);
            });
        })
        .catch(error => console.error(error));
}

getCircuits();