import subprocess

def get_pids_for_port(port):
    """
    Funció per obtenir els PIDs (identificadors de procés) 
    que estan ocupant el port especificat.
    
    Paràmetres:
        port (int): El número de port a comprovar (p.ex., 3306 o 8080).
    
    Retorna:
        Una llista d'enters amb els PIDs que escolten el port indicat.
    """
    pids = []
    try:
        # Fem servir la comanda netstat per llistar els processos 
        # que escolten al port indicat, i ho filtrem amb findstr.
        command = f'netstat -ano | findstr :{port}'
        
        # capture_output=True ens permet llegir la sortida directament
        result = subprocess.run(command, capture_output=True, text=True, shell=True)

        # Analitzem cada línia de la sortida
        for line in result.stdout.splitlines():
            # Exemple de línia: 
            # "  TCP    0.0.0.0:3306           0.0.0.0:0              LISTENING       7360"
            parts = line.split()
            # El PID normalment és l'últim element de la línia
            if len(parts) >= 5:
                pid_str = parts[-1]
                # Convertim el PID a enter i l'afegim a la llista
                pids.append(int(pid_str))
    except Exception as e:
        print(f"Error en obtenir PIDs per al port {port}: {e}")
    
    return pids

def kill_process(pid):
    """
    Funció per tancar un procés donat el seu PID.
    
    Paràmetres:
        pid (int): El PID del procés que volem finalitzar.
    
    S'executa la comanda 'taskkill /PID <pid> /F' per forçar-ne el tancament.
    """
    try:
        subprocess.run(["taskkill", "/PID", str(pid), "/F"], check=True)
        print(f"Procés {pid} tancat correctament.")
    except subprocess.CalledProcessError as e:
        print(f"Error en tancar el procés {pid}: {e}")

def main():
    """
    Funció principal que:
    1. Comprova si hi ha processos que ocupin el port 3306 (MySQL) o 8080 (Tomcat/eXist-db).
    2. Si en troba, els tanca automàticament.
    
    Nota: Assegura't d'executar aquest script com a administrador 
    per evitar problemes de permisos.
    """
    # Definim només els ports que solen causar conflicte amb XAMPP:
    ports_conflictius = [3306, 8080]
    
    # Per cada port, busquem si hi ha processos ocupant-lo
    for port in ports_conflictius:
        pids = get_pids_for_port(port)
        if pids:
            print(f"El port {port} està ocupat per aquests processos: {pids}")
            # Tanca tots els PIDs trobats
            for pid in pids:
                kill_process(pid)
        else:
            print(f"El port {port} està lliure. Cap conflicte detectat.")
    
    print("Finalitzat. Ara pots provar d'iniciar XAMPP (Apache/MySQL) sense conflictes.")

if __name__ == "__main__":
    main()
