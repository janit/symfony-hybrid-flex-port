
/// <reference path="appstate.d.ts" />
/// <reference path="axios.d.ts" />


async function initTsApp(){

    if (initialAppState.fetchMore) {

        console.log('loading more items from Vanilla JS app');

        let apiResponse = await axios.get('/api');

        let apartments = apiResponse.data.apartments;

        var output = '';

        for (let j in apartments) {

            let apartment = apartments[j];

            output += `
                        <tr>
                            <td>
                                ${ apartment.streetaddress }<br />
                                ${ apartment.city }<br />
                                ${ apartment.zipcode }
                            </td>
                            <td>${ apartment.country }</td>
                            <td>${ apartment.buildyear }</td>
                        </tr>
                        `;

        }

        let newRows = document.createElement('tbody');
        newRows.innerHTML = output;

        document.querySelector('#ts-app').appendChild(newRows);

    }
}
