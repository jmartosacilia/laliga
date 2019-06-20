// src/components/players.js

import React from 'react'
import Container from 'react-bootstrap/Container';
import Row from 'react-bootstrap/Row'
import Col from 'react-bootstrap/Col'
import Figure from 'react-bootstrap/Figure'
import queryString from 'query-string'
import tshirt from '../images/tshirt.png';

class Players extends React.Component {
    state = {
        players: []
    };
    render() {
        return (
            <Container>
                <h2>PLAYERS</h2>
                <br/>
                <Row>
                    {this.state.players.map((player) => (
                        <Col xs={4}>
                            <Figure class="text-center" style={{
                            }}>
                                <Figure.Image
                                    width={120}
                                    height={120}
                                    alt="120x120"
                                    src={tshirt}
                                />
                                <Figure.Caption class="centered">
                                    <p>{player['dorsal']}</p>
                                </Figure.Caption>
                                <Figure.Caption class="text-center">
                                    <p>{player['name']}</p>
                                </Figure.Caption>
                            </Figure>
                        </Col>
                    ))}
                </Row>
            </Container>)
    }
    componentDidMount() {
        const value = queryString.parse(this.props.location.search);
        const club = value.club;

        let uri = 'http://laliga-api.loc/app_dev.php/api/v1/';

        if (typeof value.club !== 'undefined') {
            uri = uri + 'clubs/' + club + '/players';
        } else {
            uri = uri + 'players';
        }

        console.log(uri);

        fetch(uri)
            .then(res => res.json())
            .then((data) => {
                console.log(data);
                this.setState({ players: data })
            })
            .catch(console.log);
    }
}
export default Players