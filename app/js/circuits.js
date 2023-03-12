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
                let circuitListNationality = document.createElement('td');
                circuitListNationality.textContent = `${circuit.country}`;
                circuitsList.appendChild(circuitListNationality);
                let circuitListDateOfBirth = document.createElement('td');
                circuitListDateOfBirth.textContent = `${circuit.length}`;
                circuitsList.appendChild(circuitListDateOfBirth);
                let circuitListTeam = document.createElement('td');
                circuitListTeam.textContent = `${circuit.numberOfTurns}`;
                circuitsList.appendChild(circuitListTeam);
                circuitsTable.appendChild(circuitsList);
            });
        })
        .catch(error => console.error(error));
}

getCircuits();