import json
import os

# Definir la nueva ruta del archivo JSON
DATA_PATH = "MODULO_0/pruebas consulta de datos Assassin's Creed/datos/assassins.json"

# Asegurar que el directorio existe antes de escribir el archivo
os.makedirs(os.path.dirname(DATA_PATH), exist_ok=True)

# Clase para representar un Assassin
class Assassin:
    def __init__(self, nombre, epoca, ubicacion, nacimiento, juego, anios_actividad):
        self.nombre = nombre  # Nombre del Assassin
        self.epoca = epoca  # Época histórica
        self.ubicacion = ubicacion  # Ubicación principal
        self.nacimiento = nacimiento  # Lugar de nacimiento
        self.juego = juego  # Juego en el que aparece
        self.anios_actividad = anios_actividad  # Años en los que estuvo activo (lista)

    def to_dict(self):
        return {
            "nombre": self.nombre,
            "epoca": self.epoca,
            "ubicacion": self.ubicacion,
            "nacimiento": self.nacimiento,
            "juego": self.juego,
            "anios_actividad": self.anios_actividad,
        }

    @staticmethod
    def from_dict(data):
        return Assassin(
            data["nombre"],
            data["epoca"],
            data["ubicacion"],
            data["nacimiento"],
            data["juego"],
            data["anios_actividad"],
        )

# Cargar la lista de Assassins desde un archivo JSON
def cargar_assassins():
    try:
        with open(DATA_PATH, "r", encoding="utf-8") as file:
            return [Assassin.from_dict(item) for item in json.load(file)]
    except (FileNotFoundError, json.JSONDecodeError):
        return []

# Guardar la lista de Assassins en un archivo JSON
def guardar_assassins():
    with open(DATA_PATH, "w", encoding="utf-8") as file:
        json.dump([a.to_dict() for a in assassins], file, indent=4, ensure_ascii=False)

# Lista de Assassins con información relevante
assassins = cargar_assassins()

# Función para añadir un nuevo Assassin
def agregar_assassin():
    nombre = input("Nombre del Assassin: ").strip()
    epoca = input("Época histórica: ").strip()
    ubicacion = input("Ubicación principal: ").strip()
    nacimiento = input("Lugar de nacimiento: ").strip()
    juego = input("Juego en el que aparece: ").strip()
    anios_actividad = input("Años de actividad (separados por comas): ").strip()
    
    # Validar años de actividad
    try:
        anios_actividad = [int(a.strip()) for a in anios_actividad.split(",") if a.strip().isdigit()]
    except ValueError:
        print("Error: Ingrese solo números separados por comas para los años de actividad.")
        return
    
    assassins.append(Assassin(nombre, epoca, ubicacion, nacimiento, juego, anios_actividad))
    guardar_assassins()
    print("Assassin añadido correctamente.")

# Función para mostrar la cronología
def mostrar_cronologia():
    assassins_ordenados = sorted(assassins, key=lambda x: min(x.anios_actividad))
    print("\nLista de Assassins en orden cronológico:")
    for assassin in assassins_ordenados:
        print(f"- {assassin.nombre}")
    
    while True:
        opcion = input("\n¿Quieres imprimir más datos? (s/n): ").strip().lower()
        if opcion in ["s", "n"]:
            break
        print("Por favor, ingrese 's' para sí o 'n' para no.")
    
    if opcion == "s":
        while True:
            print("Opciones disponibles:")
            print("1. Nombre y juego")
            print("2. Nombre y época")
            print("3. Nombre, época y ubicación")
            seleccion = input("Selecciona una opción (1/2/3): ").strip()
            
            if seleccion in ["1", "2", "3"]:
                break
            print("Por favor, elige una opción válida (1, 2 o 3).")
        
        for assassin in assassins_ordenados:
            if seleccion == "1":
                print(f"- {assassin.nombre} [{assassin.juego}]")
            elif seleccion == "2":
                print(f"- {assassin.nombre} ({assassin.epoca})")
            elif seleccion == "3":
                print(f"- {assassin.nombre} ({assassin.epoca}) - {assassin.ubicacion}")

# Programa principal
while True:
    while True:
        opcion = input("\n¿Quieres añadir un nuevo Assassin? (s/n): ").strip().lower()
        if opcion in ["s", "n"]:
            break
        print("Por favor, ingrese 's' para sí o 'n' para no.")
    
    if opcion == "s":
        agregar_assassin()
    else:
        mostrar_cronologia()
        break
