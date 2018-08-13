import { DemocatModule } from './democat.module';

describe('DemocatModule', () => {
  let democatModule: DemocatModule;

  beforeEach(() => {
    democatModule = new DemocatModule();
  });

  it('should create an instance', () => {
    expect(democatModule).toBeTruthy();
  });
});
