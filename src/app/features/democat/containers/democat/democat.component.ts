import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { WpApiService } from '@app/shared/services';
import { Observable } from 'rxjs';

@Component({
  selector: 'app-democat',
  templateUrl: './democat.component.html',
  styleUrls: ['./democat.component.scss']
})
export class DemocatComponent implements OnInit {

  datas$: Observable<any>;

  constructor(
    private _router: Router,
    private _wpApi: WpApiService
  ) { }

  ngOnInit() {
    this.datas$ = this._wpApi.getData({path: 'demo', slug: ``});
  }

}
