export function createCourse(credentials, token){
    console.log(credentials);
    return new Promise((res,rej)=>{
        axios.post('/api/courses/create/', credentials, { 
            headers: {
                'Authorization': 'Bearer ' + token, 
                'Content-Type': 'application/json'
            } 
        })
        .then(response => {
            console.log("Here");
            res(response.data);
        })
        .catch(err => {
            console.log("Error");
            rej('An error occured.. try again later.')
        })
    })
}

export function getCourses(token){
    return new Promise((res,rej)=>{
        axios.get('/api/courses/', {headers: {'Authorization': 'Bearer ' + token}})
        .then(response => {
            res(response.data);
        })
        .catch(err => {
            rej('Courses could not be fetched');
        })
    });
}

export function getCourseById(id, token){
    // console.log(id, token);
    return new Promise((res, rej)=>{
        axios.get("/api/courses/" + id, {headers: {'Authorization': 'Bearer ' + token}})
        .then(response => {
            res(response.data);
        })
        .catch(err => {
            rej('Course could not be fetched');
        })
    });
}

export function updateCourse(id, data, token){
    console.log(id, data, token);
    return new Promise((res, rej)=>{
        axios.put("/api/courses/" + id, data, {headers: {'Authorization': 'Bearer ' + token}})
        .then(response => {
            res(response.data);
        })
        .catch(err => {
            rej('Course could not be updated');
        })
    });
}

export function deleteCourse(id, token){
    console.log(id, token);
    return new Promise((res, rej)=>{
        axios.delete("/api/courses/" + id, {headers: {'Authorization': 'Bearer ' + token}})
        .then(response => {
            res(response.data);
        })
        .catch(err => {
            rej('Course could not be deleted');
        })
    });
}
