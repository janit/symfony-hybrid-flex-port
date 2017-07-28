// create constructor
var ApartmentListing = Vue.extend({
    template: `
        <div>
            <h2>Hello from Vue</h2>
            <table>
            <tr v-for="apartment in apartments">
                <td>
                    {{ apartment.streetaddress }}<br />
                    {{ apartment.city }}<br />
                    {{ apartment.zipcode }}
                </td>
                <td>{{ apartment.country }}</td>
                <td>{{ apartment.buildyear }}</td>
            </tr>
            </table>
        </div>
    `,
    data: function () {

        let vueAppState = initialAppState;

        return vueAppState;
    },

    created: function () {

        if(this.fetchMore) {

            console.log('loading more items from Vue app');

            var that = this;

            setTimeout( () => {

            axios.get('/api')
                .then(function (response) {

                    for (var i in response.data.apartments) {
                        that.apartments.push(response.data.apartments[i]);
                    }

                })
                .catch(function (error) {
                    console.log(error);
                });

                console.log('SWAGGER');

            },5000);
        }


    }
});
// create an instance of ApartmentListing and mount it on an element
new ApartmentListing().$mount('#vue-app');