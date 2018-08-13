import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { environment } from '../../../environments/environment';

@Injectable({
  providedIn: 'root'
})
export class WpApiService {

  private readonly _wpBase = environment.wpBase;

  constructor(public http: HttpClient) { }

  getData(query: {path: string, slug: string}) {
    // WP API only return response as Array.
    // Force http.get() return response as Array type with <any[]>.
    return  this.http.get<any[]>(this._wpBase + query.path + `?${query.slug}`);
  }
}
