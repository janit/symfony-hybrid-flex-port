import React, {Component} from 'react'
import {render} from 'react-dom'

class Apartments extends Component {

    constructor(props) {
        super(props);

        this.state = {
            apartments: [],
        };
    }

    componentDidMount() {

        if(this.props.state.fetchMore){

            console.log('loading more items from React app');

            axios.get('/api')
                .then(res => {
                    var apartments = res.data.apartments;

                    this.setState({ apartments });
                });

        }
    }

    renderRows(apartment) {

        return  <tr key={ apartment.id }>
                    <td>
                        { apartment.streetaddress }<br />
                        { apartment.city }<br />
                        { apartment.zipcode }
                    </td>
                    <td>{ apartment.country }</td>
                    <td>{ apartment.buildyear }</td>
                </tr>
    }

    render() {
        return  <div>
                    <h2>Hello from React</h2>
                    <table>
                        <tbody>
                        {this.props.state.apartments.map(this.renderRows)}
                        </tbody>
                    </table>
                </div>

    }
}

render(<Apartments state={initialAppState} />, document.getElementById('app'));