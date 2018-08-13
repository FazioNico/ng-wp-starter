import { MenuNavModule } from './menu-nav.module';

describe('MenuNavModule', () => {
  let menuNavModule: MenuNavModule;

  beforeEach(() => {
    menuNavModule = new MenuNavModule();
  });

  it('should create an instance', () => {
    expect(menuNavModule).toBeTruthy();
  });
});
