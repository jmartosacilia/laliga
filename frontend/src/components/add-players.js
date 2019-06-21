// src/components/players.js

import React from 'react'
import Container from 'react-bootstrap/Container';
import Form from 'react-bootstrap/Form'
import Alert from 'react-bootstrap/Alert'
import Button from 'react-bootstrap/Button'
import queryString from 'query-string';

class AddPlayers extends React.Component {
    constructor() {
        super();
        this.addPlayer = this.addPlayer.bind(this);
    }
    state = {
        clubs: [],
        classAlertSuccess: 'd-none',
        classAlertDanger: 'd-none',
        textAlertSuccess: '',
    };
    render() {
        return (
            <Container>
                <h2>ADD PLAYER</h2>
                <br/>
                <Form onSubmit={this.addPlayer} method="post">
                    <Form.Group controlId="name">
                        <Form.Label>Player name</Form.Label>
                        <Form.Control type="text" placeholder="Enter name" name="name" />
                    </Form.Group>
                    <Form.Group controlId="club">
                        <Form.Label>Player club</Form.Label>
                        <Form.Control as="select" name="club">
                            {this.state.clubs.map((club, index) => (
                            <option value={club['id']}>{club['name']}</option>
                            ))}
                        </Form.Control>
                    </Form.Group>
                    <Form.Group controlId="dorsal">
                        <Form.Label>Player dorsal</Form.Label>
                        <Form.Control placeholder="99" as="input" type="number" name="dorsal" />
                    </Form.Group>
                    <Form.Group controlId="dorsal">
                        <Button variant="primary" type="submit" size="lg" block>Add</Button>
                    </Form.Group>
                </Form>
                <Alert className={this.state.classAlertDanger} variant="danger" >
                    An error occurred when adding the player
                </Alert>
                <Alert className={this.state.classAlertSuccess} variant="success">
                    {this.state.textAlertSuccess}
                </Alert>
            </Container>)
    }
    componentDidMount() {
        fetch('http://laliga-api.loc/api/v1/clubs')
            .then(res => res.json())
            .then((data) => {
                this.setState({ clubs: data })
            })
            .catch(console.log);
    }

    addPlayer(event) {
        event.preventDefault();
        const data = new FormData(event.target);
        let name = data.get('name');
        let club = data.get('club');
        let dorsal = data.get('dorsal');

        const uri = 'http://laliga-api.loc/app_dev.php/api/v1/clubs/' + club + '/players';

        this.setState({classAlertSuccess: 'd-none'});
        this.setState({classAlertDanger: 'd-none'});

        let _this = this;
        const options = {
            method: 'post',
            body: queryString.stringify({dorsal: dorsal, name: name}),
            headers: {
                "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8"
            }
        };

        fetch(uri, options)
            .then(function(text) {
                _this.setState({classAlertSuccess: 'd-block'})
                _this.setState({textAlertSuccess: 'The player ' + name + ' has been added correctly'})
            })
            .catch(function(error) {
                _this.setState({classAlertDanger: 'd-block'})
            }
        );
    }
}

export default AddPlayers;