// src/components/players.js

import React from 'react'
import Container from 'react-bootstrap/Container';
import Row from 'react-bootstrap/Row'
import Col from 'react-bootstrap/Col'
import Figure from 'react-bootstrap/Figure'
import {Link} from 'react-router-dom'

class Clubs extends React.Component {
    state = {
        clubs: []
    };
    render() {
        return (
            <Container className="text-center">
                <h1>Clubs List</h1>
                <Row>
                    {this.state.clubs.map((club, index) => (
                        <Col xs={4}>
                            <Link
                                to={"/clubs/" + club.id + "/players"}
                                style={{textDecoration:'none'}}
                                key={index}
                                onClick={this.handleClick}
                            >
                                <Figure class="text-center" style={{
                                    border: '1px solid gray'
                                }}>
                                    <Figure.Image
                                        width={120}
                                        height={120}
                                        alt="120x120"
                                        src={"http://laliga-api.loc/" + club['shield']}
                                    />
                                    <Figure.Caption class="text-center">
                                        <h4>{club['name']}</h4>
                                    </Figure.Caption>
                                </Figure>
                            </Link>
                        </Col>
                    ))}
                </Row>
            </Container>)
    }
    componentDidMount() {
        fetch('http://laliga-api.loc/api/v1/clubs')
            .then(res => res.json())
            .then((data) => {
                console.log(data);
                this.setState({ clubs: data })
            })
            .catch(console.log);
    }
}
export default Clubs