require('../css/app.css');

import React from 'react';
import ReactDOM from 'react-dom';
import Items from './Items';

class App extends React.Component {
    constructor() {
        super();

        this.state = {
            entries: []
        };
    }

    componentDidMount() {
        fetch('http://127.0.0.1:8000/beer')
            .then(response => response.json())
            .then(entries => {
                this.setState({
                    entries
                });
            });
    }

    render() {
        return (
            <div className="row">
                {this.state.entries.map(
                    ({ id, name, description }) => (
                        <Items
                            key={id}
                            title={name}
                            body={description}
                        >
                        </Items>
                    )
                )}
            </div>
        );
    }
}

ReactDOM.render(<App />, document.getElementById('root'));



