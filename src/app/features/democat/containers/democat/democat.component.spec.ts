import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { DemocatComponent } from './democat.component';

describe('DemocatComponent', () => {
  let component: DemocatComponent;
  let fixture: ComponentFixture<DemocatComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ DemocatComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(DemocatComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
