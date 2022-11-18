const guardar = async(idAsistenciasAlumnos)=>{

    const idArea = $('#area').val();

    const data = new FormData();
    data.append('accion', 'modificar_area');

    data.append('datos', JSON.stringify(idAsistenciasAlumnos));
    data.append('area', idArea);

    const carpeta = window.location.pathname.substring(0,window.location.pathname.indexOf("controller")-1);

    const URL =  carpeta +'/controller/areas/controler_area.php';
    const CONFIG = {
        method: 'POST',
        body: data
    };
    // Realizo la peticion

    try {
        // Seccion guardar la asistencia de los alumnos
        const resultPeticionGuardadoAsistenciaAlumnos = await fetch(URL, CONFIG);
        const resultDatosGuardadoAsistenciaAlumnos = await resultPeticionGuardadoAsistenciaAlumnos.json();
        console.log(resultDatosGuardadoAsistenciaAlumnos);
    } catch (e) {
        console.log(e);
    }

    return;
}