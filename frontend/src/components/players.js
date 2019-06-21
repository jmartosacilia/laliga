// src/components/players.js

import React from 'react'
import Container from 'react-bootstrap/Container';
import Row from 'react-bootstrap/Row'
import Col from 'react-bootstrap/Col'
import Figure from 'react-bootstrap/Figure'
import queryString from 'query-string'
import tshirt from '../images/tshirt.png';
import laliga from '../images/laliga.png'

class Players extends React.Component {
    state = {
        club: [],
        players: [],
        shield: laliga,
    };
    render() {
        return (
            <Container>
                {(this.state.club.id ?
                    <h2>{this.state.club.name} PLAYERS </h2>
                    :
                    <h2>ALL PLAYERS</h2>)
                }
                <Figure.Image
                    width={100}
                    height={100}
                    alt="100x100"
                    src={this.state.shield}
                />
                <br/>
                <Row>
                    {this.state.players.map((player) => (
                        <Col xs={4} key={player.id} className="text-center">
                            <Figure style={{
                            }}>
                                <Figure.Image
                                    width={120}
                                    height={120}
                                    alt="120x120"
                                    src={tshirt}
                                />
                                <Figure.Caption className="centered">
                                    <h4>{player['dorsal']}</h4>
                                </Figure.Caption>
                                <Figure.Caption>
                                    <h4>{player['name']}</h4>
                                </Figure.Caption>
                            </Figure>
                        </Col>
                    ))}
                </Row>
            </Container>
        )
    }
    componentDidMount() {
        const value = queryString.parse(this.props.location.search);
        const club = value.club;

        let uri = process.env.REACT_APP_API_URL + '/api/v1/';

        if (typeof value.club !== 'undefined') {
            uri = uri + 'clubs/' + club;

            fetch(uri)
                .then(res => res.json())
                .then((data) => {
                    const shield = process.env.REACT_APP_API_URL + '/' + data['shield'];
                    this.setState({ players: data.players, club: data, shield: shield });
                })
                .catch(console.log);

        } else {
            uri = uri + 'players';

            fetch(uri)
                .then(res => res.json())
                .then((data) => {
                    this.setState({ players: data })
                })
                .catch(console.log);
        }
    }
}
export default Players