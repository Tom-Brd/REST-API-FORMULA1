function getDrivers() {
    fetch('http://localhost:8888/REST-API-FORMULA1/drivers')
        .then(response => response.json())
        .then(data => {
            let driversTable = document.getElementById("drivers__table--body");
            data.forEach(driver => {
                let driversList = document.createElement("tr");
                let driverListName = document.createElement('td');
                driverListName.textContent = `${driver.name}`;
                driversList.appendChild(driverListName);
                let driverListNationality = document.createElement('td');
                driverListNationality.textContent = `${driver.nationality}`;
                driversList.appendChild(driverListNationality);
                let driverListTeam = document.createElement('td');
                driverListTeam.textContent = `${driver.team_name}`;
                driversList.appendChild(driverListTeam);
                driversTable.appendChild(driversList);
            });
        })
        .catch(error => console.error(error));
}

getDrivers();