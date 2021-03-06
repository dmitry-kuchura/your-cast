import React from 'react'
import {Route, Redirect} from 'react-router'
import {connect} from 'react-redux'
import Main from '../main';

const PrivateRoute = ({component: Component, isAuthenticated, ...rest}) => (
    <Route {...rest} render={props => (
        isAuthenticated ? (
            <Main>
                <Component {...props} />
            </Main>
        ) : (
            <Redirect to={{
                pathname: '/account/login',
                state: {from: props.location}
            }}/>
        )
    )}/>
);

const mapStateToProps = (state) => {
    return {
        isAuthenticated: state.Auth.isAuthenticated,
    }
};

export default connect(mapStateToProps)(PrivateRoute);
