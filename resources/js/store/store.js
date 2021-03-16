import { createStore } from "vuex";

const store = createStore({
	state: {
		// user: null,
		// isLoggedIn: false
		status: '',
		token: localStorage.getItem('token') || '',
    	user: {}
	},
	getters: {
		user: state => state.user,
		/*isLoggedIn: state => (state.user !== null)*/
		isLoggedIn: state => !!state.token,
  		authStatus: state => state.status
	},
	mutations: {
		setAuthUser(state, user) {
			state.user = user;
		},
		/*setIsLoggedIn(state, loggedIn) {
			state.isLoggedIn = loggedIn;
		}*/
		auth_request(state) {
			state.status = 'loading';
		},
		auth_success(state, token) {
			state.status = 'success';
			state.token = token;
			// state.user = user;
		},
		auth_error(state) {
			state.status = 'error';
		},
		logout(state) {
			state.status = '';
			state.token = '';
		},
	},
	actions: {
		/*setDefaults: ({commit}, loggedIn) => {
			if (loggedIn) {
				commit('setIsLoggedIn', true);
			} else {
				commit('setAuthUser', null);
				commit('setIsLoggedIn', false);
			}

			console.log('state.user: ', state.user);		
			localStorage.setItem('auth_user', state.user);
		},*/
		login({commit}, user) {
			return new Promise((resolve, reject) => {
				commit('auth_request');

				axios.post('/login', user)
				// axios({url: 'http://localhost:3000/login', data: user, method: 'POST' })
				.then(resp => {
					const token = resp.data.token;
					const user = resp.data.user;

					localStorage.setItem('token', token);
					axios.defaults.headers.common['Authorization'] = token;

					// commit('auth_success', token, user);
					commit('auth_success', token);
					commit('setAuthUser', user);

					resolve(resp);
				})
				.catch(err => {
					commit('auth_error');
					localStorage.removeItem('token');
					reject(err);
				});
			});
		},
		logout({commit}) {
			return new Promise((resolve, reject) => {
				commit('logout');
				localStorage.removeItem('token');
				delete axios.defaults.headers.common['Authorization'];
				resolve();
			});
		}
	}
})

export default store;