var __awaiter = (this && this.__awaiter) || function (thisArg, _arguments, P, generator) {
    return new (P || (P = Promise))(function (resolve, reject) {
        function fulfilled(value) { try { step(generator.next(value)); } catch (e) { reject(e); } }
        function rejected(value) { try { step(generator["throw"](value)); } catch (e) { reject(e); } }
        function step(result) { result.done ? resolve(result.value) : new P(function (resolve) { resolve(result.value); }).then(fulfilled, rejected); }
        step((generator = generator.apply(thisArg, _arguments)).next());
    });
};
function initTsApp() {
    return __awaiter(this, void 0, void 0, function* () {
        if (initialAppState.fetchMore) {
            console.log('loading more items from Vanilla JS app');
            let apiResponse = yield axios.get('/api');
            let apartments = apiResponse.data.apartments;
            var output = '';
            for (let j in apartments) {
                let apartment = apartments[j];
                output += `
                        <tr>
                            <td>
                                ${apartment.streetaddress}<br />
                                ${apartment.city}<br />
                                ${apartment.zipcode}
                            </td>
                            <td>${apartment.country}</td>
                            <td>${apartment.buildyear}</td>
                        </tr>
                        `;
            }
            let newRows = document.createElement('tbody');
            newRows.innerHTML = output;
            document.querySelector('#ts-app').appendChild(newRows);
        }
    });
}
