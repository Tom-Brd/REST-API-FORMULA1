const queryString = window.location.search;
const url = window.location.href;
let dataType = url.substring(url.lastIndexOf('/') + 1, url.lastIndexOf('.html'));
const urlParams = new URLSearchParams(queryString);
const dataId = urlParams.get('id');

if (urlParams.has('id')) {
    getSingleData(dataType, dataId);
} else {
    getAllData(dataType);
}

function handleData(dataType, data) {
    switch (dataType) {
        case 'drivers':
            createDriver(data);
            break;
        case 'circuits':
            createCircuit(data);
            break;
        case 'teams':
            createTeam(data);
            break;
        default:
            break;
    }
}

function getAllData(dataType) {
    fetch('http://localhost:8888/REST-API-FORMULA1/' + dataType)
        .then(response => response.json())
        .then(allData => {
            allData.forEach(singleData => {
                handleData(dataType, singleData)
            })
    })
        .catch(error => console.error(error));
}


function getSingleData(dataType, dataId) {
    fetch('http://localhost:8888/REST-API-FORMULA1/' + dataType + '/show/' + dataId)
        .then(response => response.json())
        .then(data => {
            handleData(dataType, data)
        })
        .catch(error => console.error(error));
}

function deleteData(dataType, dataId) {
    fetch('http://localhost:8888/REST-API-FORMULA1/' + dataType + '/delete/' + dataId, {
        mode: 'cors',
        method: 'DELETE'
    })
        .then(response => {
            if (!response.ok) {
                throw new Error('There has been an error');
            }
        })
        .then(data => console.log(data))
        .catch(error => {
            console.error('There was a problem with the delete HTTP call: ', error);
        })
    location.reload();
}

function createDriver(driver) {
    let driversTable = document.getElementById("drivers__table--body");
    let driversList = document.createElement("tr");
    let driverListName = document.createElement('td');
    driverListName.textContent = `${driver.name}`;
    driversList.appendChild(driverListName);
    let driverListNationality = document.createElement('td');
    driverListNationality.textContent = `${driver.nationality}`;
    driversList.appendChild(driverListNationality);
    let driverListDateOfBirth = document.createElement('td');
    driverListDateOfBirth.textContent = `${driver.dateOfBirth}`;
    driversList.appendChild(driverListDateOfBirth);
    let driverListTeam = document.createElement('td');
    driverListTeam.textContent = `${driver.team_name}`;
    driversList.appendChild(driverListTeam);
    let driverListCarNumber = document.createElement('td');
    driverListCarNumber.textContent = `${driver.carNumber}`;
    driversList.appendChild(driverListCarNumber);
    let driverListDelete = document.createElement('td');
    let driverListDeleteBalise = document.createElement('a');
    driverListDeleteBalise.href = "javascript:deleteData(\"drivers\", " + driver.id + ");";
    driverListDeleteBalise.textContent = "DELETE";
    driverListDelete.appendChild(driverListDeleteBalise);
    driversList.appendChild(driverListDelete);
    driversTable.appendChild(driversList);
}

function createCircuit(circuit) {
    let circuitsTable = document.getElementById("circuits__table--body");
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
    let circuitListDelete = document.createElement('td');
    let circuitListDeleteBalise = document.createElement('a');
    circuitListDeleteBalise.href = "javascript:deleteData(\"circuits\", " + circuit.id + ");";
    circuitListDeleteBalise.textContent = "DELETE";
    circuitListDelete.appendChild(circuitListDeleteBalise);
    circuitsList.appendChild(circuitListDelete);
    circuitsTable.appendChild(circuitsList);
}

function createTeam(team) {
    let teamsTable = document.getElementById("teams__table--body");
    let teamsList = document.createElement("tr");
    let teamListName = document.createElement('td');
    teamListName.textContent = `${team.name}`;
    teamsList.appendChild(teamListName);
    let teamListCountry = document.createElement('td');
    teamListCountry.textContent = `${team.country}`;
    teamsList.appendChild(teamListCountry);
    let teamListTeamPrincipal = document.createElement('td');
    teamListTeamPrincipal.textContent = `${team.teamPrincipal}`;
    teamsList.appendChild(teamListTeamPrincipal);
    let teamListYearOfCreation = document.createElement('td');
    teamListYearOfCreation.textContent = `${team.yearOfCreation}`;
    teamsList.appendChild(teamListYearOfCreation);
    let teamListDelete = document.createElement('td');
    let teamListDeleteBalise = document.createElement('a');
    teamListDeleteBalise.href = "javascript:deleteData(\"teams\", " + team.id + ");";
    teamListDeleteBalise.textContent = "DELETE";
    teamListDelete.appendChild(teamListDeleteBalise);
    teamsList.appendChild(teamListDelete);
    teamsTable.appendChild(teamsList);
}