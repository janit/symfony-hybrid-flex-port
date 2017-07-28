/// <reference path="appstate.d.ts" />

import axios from 'axios'

initTsApp();

async function initTsApp(){

    if (initialAppState.fetchMore) {

        console.log('loading more items from Vanilla JS app');

        let apiResponse: any = await axios.get('/api');

        let apartments = apiResponse.data.apartments;

        let output = apartments.reduce( (output,apartment) => {

            return output + `
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

        },'');

        let newRows = document.createElement('tbody');
        newRows.innerHTML = output;

        document.querySelector('#ts-app table').appendChild(newRows);

    }
}
