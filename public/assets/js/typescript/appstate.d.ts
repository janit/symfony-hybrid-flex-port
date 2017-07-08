interface AppState {

    sortBy: string;
    selectedCountry: string;
    apartments: ApartmentEntity[];
    fetchMore: boolean;

}

interface ApartmentEntity {

    id: number;
    streetaddress: string;
    city: string;
    zipcode: string;
    country: string;
    buildyear: number;
    size: number;

}

declare var appState: AppState;
declare var initialAppState: AppState;
